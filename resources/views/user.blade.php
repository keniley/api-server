@extends ('layout')
  @section ('content')
      <h1>List of users</h1>
      <table class="table table-striped">
        @foreach($data as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td style="text-align:center">@if($item->is_admin) Admin @else User @endif</td>
          </tr>
        @endforeach
      </table>
      <div class="col-md-6 col-sm-12">
        <form action="/user" method="post">
          {{ csrf_field() }}

          <div class="col-md-6 col-sm-12">
            <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" id="name" name="name" placeholder="Name">
            </div>
          </div>

          <div class="col-md-6 col-sm-12">
            <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
            </div>
          </div>

          <div class="col-md-6 col-sm-12">
            <div class="form-group">
            <label for="pwd">Password:</label>
            <input class="form-control" name="password" id="pwd" placeholder="Password">
            </div>
          </div>

          <div class="col-md-6 col-sm-12">
            <div class="form-group">
            <label for="pwd">Competency:</label>
            <select class="form-control selectpicker" name="is_admin">
              <option value="0" SELECTED>User</option>
              <option value="1">Admin</option>
            </select>
            </div>
          </div>

          <div class="col-md-12 col-sm-12">
            <button type="submit" class="btn btn-success">Save</button>
          </div>

          <div class="clearfix"></div>

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

        </form>
      </div>
@endsection
  