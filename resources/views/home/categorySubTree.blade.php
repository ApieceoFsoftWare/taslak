@foreach ($children as $child)   
    <ul class="sub-category">
        <li><a href="{{ route('advertisements',['id'=>$child->id, 'slug'=>$child->title]) }}">{{ $child->title }} <i class="fa fa-angle-right" aria-hidden="true"></i></a></li> 
        @if (count($child->children))
            @include('home.categorySubTree',['children' => $child->children])
        @endif
    </ul>
@endforeach                                  
