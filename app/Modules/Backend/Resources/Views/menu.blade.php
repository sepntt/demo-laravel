      <ul class="sidebar-menu" data-widget="tree">
        @foreach($__menu as $item)
          @if(!isset($item['children']))
          <li>
              @if(url()->isValidUrl($item['uri']))
                  <a href="{{ $item['uri'] }}" target="_blank">
              @else
                   <a href="{{ mUrl($item['uri']) }}">
              @endif
                  <i class="fa {{$item['icon']}}"></i>
                  <span>{{ $item['title'] }}</span>
              </a>
          </li>
          @else
          <li class="treeview">
            <a href="#">
              <i class="fa fa-share {{ $item['icon'] }}"></i> <span>{{ $item['title'] }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                @foreach($item['children'] as $item)
                  <li>
                    <a href="{{ mUrl($item['uri']) }}">
                      <i class="fa fa-share {{ $item['icon'] }}"></i> <span>{{ $item['title'] }}</span>
                    </a>
                  </li>
                @endforeach
            </ul>
          </li>
          @endif
        @endforeach
        
      </ul>