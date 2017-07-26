{!! Form::open( ['route' => ['showEntryByText', null ]] ) !!}
<div class="input-group">
    <input type="text" class="form-control search-term" placeholder="{{__('dashboard.search')}}" name="term">
    <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
    </div>
</div>
{!! Form::close() !!}