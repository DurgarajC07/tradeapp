<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trade</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Trade</div>
                <div class="card-body">
                    <form action="{{ route('trade.update', $trade->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="trade_date_time">Trade Date Time:</label>
                            <input type="datetime-local" class="form-control" id="trade_date_time" name="trade_date_time" value="{{ $trade->trade_date_time }}">
                        </div>
                        <div class="form-group">
                            <label for="stock_name">Stock Name (Symbol):</label>
                            <input type="text" class="form-control" id="stock_name" name="stock_name" value="{{ $trade->stock_name }}">
                        </div>
                        <div class="form-group">
                            <label for="listing_price">Listing Price:</label>
                            <input type="number" class="form-control" id="listing_price" name="listing_price" value="{{ $trade->listing_price }}">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $trade->quantity }}">
                        </div>
                        <div class="form-group">
                            <label for="type">Type:</label>
                            <select class="form-control" id="type" name="type">
                                <option value="buy" {{ $trade->type == 'buy' ? 'selected' : '' }}>Buy</option>
                                <option value="sell" {{ $trade->type == 'sell' ? 'selected' : '' }}>Sell</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price_per_unit">Price Per Unit:</label>
                            <input type="number" class="form-control" id="price_per_unit" name="price_per_unit" value="{{ $trade->price_per_unit }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Trade</button>
                    </form>
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

