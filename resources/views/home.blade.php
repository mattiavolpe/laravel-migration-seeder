@extends("layouts.app")

@section("content")
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-4">
            @forelse($trains as $train)
            <div class="col">
                <div class="card h-100">
                    <div class="card-header">
                        @if($train -> suppressed == true)
                        <h6 class="text-center text-uppercase mb-0 text-danger">{{ $train -> train_code }}</h6>
                        @else
                        <h6 class="text-center text-uppercase mb-0 text-success">{{ $train -> train_code }}</h6>
                        @endif
                    </div>
                    <div class="card-body">
                        <h6>Train company: <span class="text-secondary">{{ $train -> company }}</span></h6>
                        <h6>Departure station: <span class="text-secondary">{{ $train -> departure_station }}</span></h6>
                        <h6>Arrival station: <span class="text-secondary">{{ $train -> arrival_station }}</span></h6>
                        <h6>Departure time: <span class="text-secondary">{{ $train -> departure_time }}</span></h6>
                        <h6>Arrival time: <span class="text-secondary">{{ $train -> arrival_time }}</span></h6>
                        <h6>Carriages: <span class="text-secondary">{{ $train -> carriages }}</span></h6>
                        
                        <h6 class="d-inline">On time: </h6>
                        @if($train -> on_time == true)
                            <i class="fa-solid fa-traffic-light text-success"></i>
                        @else
                            <i class="fa-solid fa-traffic-light text-danger"></i>
                        @endif

                        <h6>Suppressed: 
                        @if($train -> suppressed == true)
                            <span class="text-danger">Yes</span>
                        @else
                            <span class="text-success">No</span>
                        @endif
                        </h6>
                        
                        <h4 class="card-title"></h4>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            @empty
            <h4 class="text-center">No trains scheduled</h4>
            @endforelse
        </div>
        <!-- /.row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 -->
    </div>
    <!-- /.container -->
@endsection
