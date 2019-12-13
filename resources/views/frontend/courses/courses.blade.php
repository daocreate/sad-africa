
<div class="container col-md-12">
    <div class="row col-sm-12">
        <div class=" main_title ">
            <h2>{{__('latest_courses')}}</h2>
            <p class="mb-3">There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think about setting up your own viewing station.</p>
            @foreach ( $formations as $key => $formation )
                <div class="card border-success -2X mb-3  rounded shadow p-3 btn-light"  >
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ $formation->getFirstMediaUrl('formation') }}" class="card-img" alt="{{ $formation->label }}" style="width: 13rem; height: 13rem;"  />
                        </div>
                        <div class="container col-md-8">
                            <div class="card-body">
                                <div class="row overflow-hidden">
                                    <h3  style="color: #5BC01E"> {{ $formation->category->name}} </h3>
                                    <small><h3>{{ $formation->label }} - <i class="fa fa-clock-o "></i> {{ $formation->length}}</h3></small>
                                </div>
                                <p class="card-text">{{ $formation->description }}</p>
                            </div>
                            <ul class="list list-group-horizontal">
                                <li><a href="#"><i class="lnr lnr-bubble"></i> 35</a></li>
                                <li><a href="#" style="color: #5BC01E"><i class="lnr lnr-user"></i> {{__('former')}} : {{ $formation->former->name }}</a></li>
                                <p class="card-text float-right"><small class="text-muted ">{{ $formation->updated_at }}</small></p>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class=" main_title col-sm">

            <div class="container">
                <h2>{{__('last')}} {{__('events')}}</h2>
                <p class="mb-3"> Here list latest event and calendar</p><br>

                <div class="jumbotron ">
                    <div class="row">
                        <div class="col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    {!! $calendar->calendar() !!}
                                    {!! $calendar->script() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Swich carbon language --}}
                @php $locale = session()->get('locale'); @endphp
                @switch($locale)
                @case('fr')
                    {{ \Carbon\Carbon::setLocale('fr') }}
                @break
                @default
                    {{ \Carbon\Carbon::setLocale('en') }}
                @endswitch
                {{-- End Swich carbon language --}}

            @foreach($events as $event)
                    <div class="card text-center border-success mb-3" >
                        <div class="card-header border-primary" style="background: {{ $event->color }}; color: white">
                            <h3><strong>{{ $event->title }}</strong></h3>
                        </div>
                        <div class="card-body">

                            <h5 class="card-title"><strong>{{__('start')}}</strong>
                                {{--{{  \Carbon\Carbon::parse($event->start_date)->formatLocalized("%d %B %Y à %Hh%M") }}<br/>--}}
                                {{ Carbon\Carbon::parse($event->end_date)->format('d M  Y H:h') }}
                            </h5>
                            <p class="card-text">{{ $event->description }}</p>

                        </div>
                        <div class="card-footer text-muted">

                            <h5 class="card-title">{{ \Carbon\Carbon::parse($event->start_date)->diffForHumans()}}</h5>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

</div>
