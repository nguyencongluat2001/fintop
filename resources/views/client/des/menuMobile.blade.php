<div class="container d-flex justify-content-between align-items-center link-datafinancial active-menuClient active-menuClient-mobile">
    <ul class="navbar-nav d-flex justify-content-between text-dark">
        @if(isset($datasMenuDes) && count($datasMenuDes) > 0)
        @foreach($datasMenuDes as $key => $data)
        @php $id = $data['id']; @endphp
        <li class="nav-item" style="width: 100%">
            <a href="javascript:;" class="link-menu-des link-menu-des-{{$id}}" type="button" style="width: 100%;color: #000;" onclick="list('{{$id}}')">
                <i style="margin-top: 10px;" class="fas fa-book"></i>
                <span style="margin-top: 10px;">{{ $data->name_category }}</span>
            </a>
        </li>
        @endforeach
        @endif
    </ul>
</div>