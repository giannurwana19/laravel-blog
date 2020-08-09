@include('template_blog.header')

<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    @yield('content')
    @include('template_blog.widget')
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

@include('template_blog.footer')