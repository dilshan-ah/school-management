<a class="btn w-full justify-start" href="/" id="home">
  <i class="fi fi-rr-house-chimney"></i>
  My account
</a>

<button class="btn w-full justify-start" id="routines">
  <i class="fi fi-rr-calendar-day"></i>
  Class routines
</button>

<button class="btn w-full justify-start" id="attendance">
  <i class="fi fi-rr-list-check"></i>
  Attendance
</button>

<button class="btn w-full justify-start" id="exams">
  <i class="fi fi-rr-e-learning"></i>
  Online Exams
</button>

<button class="btn w-full justify-start" id="marks">
  <i class="fi fi-rr-memo-circle-check"></i>
  Marks
</button>

<a class="btn w-full justify-start" href="{{ route('news-event') }}" id="news-event">
  <i class="fi fi-rr-calendar-star"></i>
  News and events
</a>

<script>
  document.addEventListener("DOMContentLoaded", function () {
      var currentPath = window.location.pathname;

      var urlToMenuIdMap = {
          '/': 'home',
          '/routines': 'routines',
          '/attendance': 'attendance',
          '/exams': 'exams',
          '/marks': 'marks',
          '/events-news': 'news-event'
      };

      var currentMenuId = urlToMenuIdMap[currentPath];

      if (currentMenuId) {
          var activeMenuItem = document.getElementById(currentMenuId);
          if (activeMenuItem) {
              activeMenuItem.classList.add('btn-primary');
          }
      }
  });
</script>
