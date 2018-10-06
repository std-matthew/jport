<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">{{ config('app.name') }}</h5>
        <p class="grey-text text-lighten-4">Manage your profile with ease, show your skills and personality to the web.</p>
      </div>
      <div class="col l4 offset-l2 s12">
        <ul>
          <li><a class="grey-text text-lighten-3" href="{{ route('social.show') }}">Socials</a></li>
          <li><a class="grey-text text-lighten-3" href="{{ route('settings.show') }}">Settings</a></li>
          <li><a class="grey-text text-lighten-3" href="{{ route('user.show') }}">My Account</a></li>
          <li><a class="grey-text text-lighten-3" href="{{ route('user.password.show') }}">Security</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      © {{ $today->year }} {{ config('app.name') }}
      {{-- <a class="grey-text text-lighten-4 right" href="#!">More Links</a> --}}
    </div>
  </div>
</footer>