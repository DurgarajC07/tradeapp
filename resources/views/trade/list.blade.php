<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trade Listing</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">Trade Listing</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('trade.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="datetime-local" class="form-control" name="trade_date_time">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="stock_name" placeholder="Stock Name">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number" class="form-control" name="listing_price" placeholder="Listing Price">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="number" class="form-control" name="quantity" placeholder="Quantity">
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control" name="type">
                                    <option value="buy">Buy</option>
                                    <option value="sell">Sell</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number" class="form-control" name="price_per_unit" placeholder="Price Per Unit">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Trade</button>
                    </form>

                    <div class="table-responsive mt-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date Time</th>
                                    <th>Stock Name</th>
                                    <th>Listing Price</th>
                                    <th>Quantity</th>
                                    <th>Type</th>
                                    <th>Price Per Unit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trades as $trade)
                                    <tr>
                                        <td>{{ $trade->trade_date_time }}</td>
                                        <td>{{ $trade->stock_name }}</td>
                                        <td>{{ $trade->listing_price }}</td>
                                        <td>{{ $trade->quantity }}</td>
                                        <td>{{ $trade->type }}</td>
                                        <td>{{ $trade->price_per_unit }}</td>
                                        <td>
                                            <a href="{{ url('order/'.$trade->id.'/create') }}" class="btn btn-sm btn-primary">Order</a>
                                            <a href="{{ url('trade/'.$trade->id.'/edit') }}" class="btn btn-sm btn-info">Update</a>
                                            <form action="{{ route('trade.destroy', $trade->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this trade?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-5">
                        {{ $trades->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
