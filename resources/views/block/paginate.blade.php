<div class="row">
  <div class="col col-xs-4">Page {!! $users->currentPage() !!} of {!! $users->lastPage() !!}
  </div>
  <div class="col col-xs-8">
    <ul class="pagination hidden-xs pull-right">
     <li class="{!! ($users->currentPage() == 1) ? 'hide' : '' !!}" >
        <a  href="{!! $users->url($users->currentPage() - 1) !!}">«</a>
     </li>
        @for($i = 1; $i <= $users->lastPage(); $i++)
          <li class="{!! ($users->currentPage() == $i) ? 'active' : '' !!}" >
              <a href="{!! $users->url($i) !!}">{!! $i !!}</a>
          </li>
        @endfor
     <li class="{!! ($users->currentPage() == $users->lastPage()) ? 'hide' : '' !!}" >
        <a href="{!! $users->url($users->currentPage() + 1) !!}">»</a>
     </li>
    </ul>
  </div>
</div>