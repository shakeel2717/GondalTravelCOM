<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @livewireStyles
    @powerGridStyles
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="dashboard-main-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-8 mx-auto mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="my-2">
                                                <h2 class="card-title my-4">Finance Management</h2>
                                                <a href="/dashboard/admin" class="btn btn-primary btn-sm">Admin Dashboard</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="my-2">
                                                <h2 class="card-title my-4">Add new Entry</h2>
                                                <form action="{{ route('finance.store') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="user_id">Select Collector</label>
                                                                <select name="user_id" id="user_id" class="form-control">
                                                                    <option value="">Select a Collector</option>
                                                                    @foreach ($collectors as $collector)
                                                                    <option value="{{ $collector->id }}">{{ $collector->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="type">Select Transaction Type</label>
                                                                <select name="type" id="type" class="form-control">
                                                                    <option value="">Select a Type</option>
                                                                    @foreach ($types as $type)
                                                                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="sum">Select Transaction Method</label>
                                                                <select name="sum" id="sum" class="form-control">
                                                                    <option value="1">In</option>
                                                                    <option value="0">Out</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="amount">Amount</label>
                                                                <input type="text" name="amount" id="amount" placeholder="Enter Amount" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="description">Memo | Description</label>
                                                                <textarea type="text" name="description" id="description" placeholder="Enter Amount" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-large btn-primary mt-4">Add Transaction</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="my-2">
                                                <h2 class="card-title my-4">Recent Activity on Website</h2>
                                                <livewire:admin.all-transactions />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="my-2">
                                                <h2 class="card-title my-4">All Collectors Finance Record</h2>
                                                <livewire:admin.all-users-for-transactions-detail />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @livewireScripts
    @powerGridScripts
</body>

</html>