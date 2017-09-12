@extends('layouts.master')

@section('content')
<section>
    <div class="container">
        <div class="row m-t-5p">
            
            <div class="col-md-2 col-sm-1"></div>
            <div class="col-md-8 col-sm-10">
            <h3><p class="text-center">Payment Reciept for "{{ $reciept->event->event_name }}"</p></h3>
            <p></br></p>
                <p>NAME : {{ $reciept->user->full_name }}</p>
                <p>Email : {{ $reciept->user->email }}</p>
                <p>Phone Number : {{ $reciept->user->phone }}</p>
                <p>Event Category : {{ $reciept->event->category->name }}</p>
                <p>Event Title : {{ $reciept->event->event_name }}</p>
                <p>Ammount Paid : {{ $reciept->amount }}</p>
                <p>Payment Status : {{ $reciept->pay_status }}</p>
                <p>Payment Reference : {{ $reciept->pay_reference }}</p>
                <p>Attendee Reference : {{ $reciept->reference_code }}</p>
			<p></br></p>
            <p></br></p>

            </div>
        </div>
    </div>
</section>
@stop