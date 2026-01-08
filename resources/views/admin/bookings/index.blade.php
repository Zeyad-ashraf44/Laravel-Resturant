@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Bookings</h1>
      <h2> <div class="row-message mt-1"></div></h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Time</th>
                <th>Number of Guests</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr data-id="{{ $booking->id }}">
                <td>{{ $booking->id }}</td>
                <td class="editable" data-field="user">{{ $booking->user->name ?? 'Guest' }}</td>
                <td class="editable" data-field="name">{{ $booking->name }}</td>
                <td class="editable" data-field="phone">{{ $booking->phone }}</td>
                <td class="editable" data-field="date">{{ $booking->date }}</td>
                <td class="editable" data-field="time">{{ $booking->time }}</td>
                <td class="editable" data-field="number_of_guests">  {{ $booking->number_of_guests }}
                          <span class="text-danger error-message d-none"></span>
</td>

                <td>
                    @if($booking->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($booking->status == 'accepted')
                        <span class="badge bg-success">Accepted</span>
                    @else
                        <span class="badge bg-danger">Rejected</span>
                    @endif
                </td>
               <td>
    @if($booking->status == 'pending')
        <form method="POST" action="{{ route('admin.bookings.accept', $booking->id) }}" style="display:inline-block;">
            @csrf
            <button type="submit" class="btn btn-success btn-sm">Accept</button>
        </form>

        <form method="POST" action="{{ route('admin.bookings.reject', $booking->id) }}" style="display:inline-block;">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
        </form>
    @endif

    <span class="table table-bordered table-sm text-muted fw-light align-middle">Click to Edit</span>
</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).on("click", ".editable", function() {
    let td = $(this);
    let currentText = td.text().trim();
    let field = td.data("field");
    let id = td.closest("tr").data("id");

   
    if (td.find("input").length > 0) return;

   
    let input = $('<input type="text" class="form-control form-control-sm">').val(currentText);
    td.html(input);
    input.focus();

   
 input.keypress(function(e) {
    if (e.which == 13) { // Enter
        let newValue = $(this).val();

        // validation: max 5 guests
        if (field === "number_of_guests" && parseInt(newValue) > 5) {
            td.html(currentText);
            td.closest("tr").find(".row-message")
              .html('<span class="text-danger">Max guests 5</span>');
            setTimeout(function() {
                td.closest("tr").find(".row-message").html("");
            }, 3000);
            return;
        }

        $.ajax({
            url: "/admin/bookings/" + id,
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                _method: "PUT",
                field: field,
                value: newValue
            },
            success: function(response) {
                if (response.success) {
                    td.html(newValue); 
                    td.closest("tr").find(".row-message")
                      .html('<span class="text-success">Row updated successfully!</span>');
                } else {
                    td.html(currentText); 
                    td.closest("tr").find(".row-message")
                      .html('<span class="text-danger">Update failed!</span>');
                }
                setTimeout(function() {
                    td.closest("tr").find(".row-message").html("");
                }, 3000);
            },
            error: function() {
                td.html(currentText); 
                td.closest("tr").find(".row-message")
                  .html('<span class="text-danger">Error updating row!</span>');
                setTimeout(function() {
                    td.closest("tr").find(".row-message").html("");
                }, 3000);
            }
        });
    }
});
//input click outside
input.blur(function() {
    td.html(currentText);
});
});

</script>

@endsection