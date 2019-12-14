@extends('layouts.app')

@section('content')
    <div class="container">     

        <div class="panel panel-primary">

            <div class="panel-heading"><h3>إدارة شجرة الحسابات</h3></div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-6">

                            <h6>شجرة الحسابات</h6>

                            <ul id="tree1">

                                @foreach($accounts as $account)

                                    <li>

                                        {{ $account->ar_name }}

                                        @if(count($account->childs))

                                            @include('manageChild',['childs' => $account->childs])

                                        @endif

                                    </li>

                                @endforeach

                            </ul>

                        </div>
                    </div>    
                </div>
            </div>        
        </div>
    </div>    


@endsection