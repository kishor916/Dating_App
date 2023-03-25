<x-home>


    <form class="form-inline" method="get" action="/search">

        <div class="form-group mx-sm-3 mb-2">
          <label for="username" class="sr-only">Search by username</label>
          <input type="text" class="form-control" id="search" name="username" placeholder="Search by username...">
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <label for="gender" class="mr-2">Gender:</label>
          <select class="form-control" id="gender" name="gender">
            <option value="all">All</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <label for="distance" class="mr-2">Distance:</label>
          <div class="input-group">
            <input type="text" class="form-control" id="distance" name="distance" placeholder="Enter distance in km...">
            <div class="input-group-append">
              <select class="form-control" id="distance" name="distance">
                <option value="10">10 km</option>
                <option value="15">15 km</option>
                <option value="20">20 km</option>
                <option value="40">40 km</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <label for="age" class="mr-2">Age:</label>
          <div class="input-group">
            <select class="form-control" id="age" name="age">
              <option value="all">All</option>
              <option value="18-20">18-20</option>
              <option value="20-25">20-25</option>
              <option value="25-30">25-30</option>
              <option value="30-40">30-40</option>
              <option value="custom">Custom</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <input type="text" class="form-control" id="age-custom" name="age-custom" placeholder="Enter age range...">
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
      </form>

</x-home>
