<div id="menu-overlay">
  <div class="flex flex-col md:flex-row w-full h-full pt-[100px] md:pt-[120px] px-6 md:px-16 pb-10 gap-8 md:gap-16">
    <nav class="flex flex-col justify-center gap-1 md:gap-2 md:w-1/2" id="menu-nav">
      <a href="{{ route('home') }}" class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}" data-index="0"
         style="font-family: 'Big Daily Short', serif; font-size: clamp(32px, 6vw, 72px); font-weight: 300; color: {{ request()->routeIs('home') ? '#F8F5FF' : 'rgba(248,245,255,0.3)' }};">
      </a>
      <a href="{{ route('about') }}" class="menu-item {{ request()->routeIs('about') ? 'active' : '' }}" data-index="1"
         style="font-family: 'Big Daily Short', serif; font-size: clamp(32px, 6vw, 72px); font-weight: 300; color: {{ request()->routeIs('about') ? '#F8F5FF' : 'rgba(248,245,255,0.3)' }};">
      </a>
      <a href="{{ route('services') }}" class="menu-item {{ request()->routeIs('services*') ? 'active' : '' }}" data-index="2"
         style="font-family: 'Big Daily Short', serif; font-size: clamp(32px, 6vw, 72px); font-weight: 300; color: {{ request()->routeIs('services*') ? '#F8F5FF' : 'rgba(248,245,255,0.3)' }};">
      </a>
      <a href="{{ route('projects') }}" class="menu-item {{ request()->routeIs('projects*') ? 'active' : '' }}" data-index="3"
         style="font-family: 'Big Daily Short', serif; font-size: clamp(32px, 6vw, 72px); font-weight: 300; color: {{ request()->routeIs('projects*') ? '#F8F5FF' : 'rgba(248,245,255,0.3)' }};">
      </a>
      <a href="{{ route('insights') }}" class="menu-item {{ request()->routeIs('insights*') ? 'active' : '' }}" data-index="4"
         style="font-family: 'Big Daily Short', serif; font-size: clamp(32px, 6vw, 72px); font-weight: 300; color: {{ request()->routeIs('insights*') ? '#F8F5FF' : 'rgba(248,245,255,0.3)' }};">
      </a>
      <a href="{{ route('contact') }}" class="menu-item {{ request()->routeIs('contact') ? 'active' : '' }}" data-index="5"
         style="font-family: 'Big Daily Short', serif; font-size: clamp(32px, 6vw, 72px); font-weight: 300; color: {{ request()->routeIs('contact') ? '#F8F5FF' : 'rgba(248,245,255,0.3)' }};">
      </a>
    </nav>

    <div class="hidden md:flex md:w-1/2 items-center justify-center">
      <div class="menu-img-wrap w-full max-w-[500px] aspect-[4/5] rounded-lg overflow-hidden">
        <img src="https://images.unsplash.com/photo-1654618977232-a6c6dea9d1e8?w=800&auto=format&fit=crop" alt="" class="menu-img active grayscale hover:grayscale-0 transition-all duration-500" data-img="0">
        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&auto=format&fit=crop" alt="" class="menu-img grayscale hover:grayscale-0 transition-all duration-500" data-img="1">
        <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=800&auto=format&fit=crop" alt="" class="menu-img grayscale hover:grayscale-0 transition-all duration-500" data-img="2">
        <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&auto=format&fit=crop" alt="" class="menu-img grayscale hover:grayscale-0 transition-all duration-500" data-img="3">
        <img src="https://images.unsplash.com/photo-1596524430615-b46475ddff6e?w=800&auto=format&fit=crop" alt="" class="menu-img grayscale hover:grayscale-0 transition-all duration-500" data-img="4">
        <img src="https://images.unsplash.com/photo-1596524430615-b46475ddff6e?w=800&auto=format&fit=crop" alt="" class="menu-img grayscale hover:grayscale-0 transition-all duration-500" data-img="5">
      </div>
    </div>
  </div>
</div>
