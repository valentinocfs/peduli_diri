<nav class="navbar navbar-header navbar-expand navbar-light">
    <a class="sidebar-toggler" href="#" style="margin-right: 24px;"><span class="navbar-toggler-icon"></span></a>
    <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">  
        @if (request()->is('dashboard') || request()->is('urutkan') || request()->is('cari') )
        <div class="d-flex align-items-center">
            <form action="/cari" method="GET" class="d-flex align-items-center">
                {{ csrf_field() }}
                    <div class="">
                        <select onchange="searchByCategory(this);" class="form-control form-select" type="search" name="kategori" id="searchCategory">
                            <option value="lokasi">Lokasi</option>
                            <option value="jam">Jam</option>
                            <option value="tanggal">Tanggal</option>
                            <option value="suhu">Suhu</option>
                        </select>
                    </div>
                    <div class="">
                        <div class="form-group mb-0 d-flex mx-2" style="">
                            <input name="lokasi" id="inputSearch" class="form-control" type="search" placeholder="Cari berdasarkan lokasi" aria-label="Search" style="width: 168px" />
                            <button class="btn outline-success border" id="buttonSearch" type="submit">
                                <i class="fas fa-search" data-feather="search"></i>
                            </button>
                        </div>
                    </div>
            </form>
            <div class="">
                <button type="button" class="btn btn-outline-secondary border block" data-bs-toggle="modal" data-bs-target="#border-less">
                    <i data-feather="filter">Filter</i>
                </button>
                <div class="modal fade text-left modal-borderless" id="border-less" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <form class="form-inline" action="/urutkan" method="GET">
                            {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title">Filter Pencarian</h5>
                        </div>
                        <div class="modal-body">
                            <div>
                                <strong>Urutkan</strong>
                                <div class="d-flex justify-content-between my-2 gap-3">
                                    <select onchange="sortByCategory(this);" class="form-control form-select py-2" type="search" name="kategori" id="sortCategory">
                                        <option value="" selected></option>
                                        <option value="lokasi" >Lokasi</option>
                                        <option value="tanggal">Tanggal</option>
                                        <option value="suhu">Suhu</option>
                                    </select>
                                    <select onchange="sortByOrder(this);" class="form-control form-select py-2" type="search" name="orderBy" id="orderBy">
                                        <option value="" ></option>
                                        <option value="asc" id="sortByAsc">A - Z</option>
                                        <option value="desc" id="sortByDesc">Z - A</option>
                                    </select>
                                </div>

                                <strong class="">Data per halaman</strong>
                                <select onchange="totalPerPage(this)" name="perPage" class="form-control form-select my-2" type="search">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn" href="/dashboard">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </a>
                            <button type="submit" class="btn btn-primary ml-1" id="showSorting" disabled>
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tampilkan</span>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
                </div>
    
            </div>
        </div>
        @endif
        <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
            <li class="dropdown nav-icon">
                <a href="#" data-bs-toggle="dropdown"
                    class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                    <div class="d-lg-inline-block">
                        <i data-feather="bell"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                    <h6 class='py-2 px-4'>Notifications</h6>
                    <ul class="list-group rounded-none">
                        <li class="list-group-item border-0 align-items-start">
                            <div class="avatar bg-success me-3">
                                <span class="avatar-content"><i data-feather=""></i></span>
                            </div>
                            <div>
                                <h6 class='text-bold'>New Message</h6>
                                <p class='text-xs'>
                                   
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" data-bs-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <div class="avatar me-1">
                        <img src="{{ asset('') }}dist/assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                    </div>
                    <div class="d-none d-md-block d-lg-inline-block">
                        @if(!empty(auth()->user()->name))
                        {{ auth()->user()->name }}
                        @else
                        {{ "Anonymous" }}
                        @endif 
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="/profile"><i data-feather="user"></i> Profile</a>
                    {{-- <a class="dropdown-item" href="/pengaturan"><i data-feather="settings"></i> Pengaturan</a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="/logout" onclick="event.preventDefault();
                    document.getElementById('formLogout').submit();
                    "><i data-feather="log-out"></i>Logout</a>
                    <form action="/logout" id="formLogout" method="POST">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>


<script>
    let btnShowSorting = document.getElementById("showSorting");

    function searchByCategory(that) {
      let value = that.value;

      inputSearch = document.getElementById("inputSearch");
      buttonSearch = document.getElementById("buttonSearch");

      if(value == 'jam'){
          inputSearch.type = 'time'
      } else if (value == 'tanggal'){
          inputSearch.type = 'date'
      } else {
          inputSearch.type = 'text'
      }

      inputSearch.name = value; 
      inputSearch.placeholder = `Cari berdasarkan ${value}`; 
    }

    function sortByCategory(that) {
        let value = that.value;

        sortByOrder(value);

        btnShowSorting.disabled = false;
    }

    function sortByOrder(value){
        let sortByAsc = document.getElementById('sortByAsc');
        let sortByDesc = document.getElementById('sortByDesc');
        
        btnShowSorting.disabled = false;

        if(value === "suhu"){
            sortByAsc.innerHTML = "Terkecil";
            sortByDesc.innerHTML = "Terbesar";
        } else if(value === "tanggal"){
            sortByAsc.innerHTML = "Terbaru";
            sortByDesc.innerHTML = "Terlama";
        } else if(value === "lokasi") {
            sortByAsc.innerHTML = "A - Z";
            sortByDesc.innerHTML = "Z - A";
        }
    }

    function totalPerPage(value) {
        btnShowSorting.disabled = false;
    }
</script>