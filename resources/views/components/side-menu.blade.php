<a class="btn w-full justify-start" href="/" id="home">
  <i class="fi fi-rr-house-chimney"></i>
  My account
</a>

<a class="btn w-full justify-start" href="{{route('class')}}" id="routines">
  <i class="fi fi-rr-calendar-day"></i>
  Class routines
</a>


<a class="btn w-full justify-start" href="{{route('exam')}}" id="exam">
  <i class="fi fi-rr-e-learning"></i>
  Online Exams
</a>

<a class="btn w-full justify-start" href="{{route('question')}}" id="question">
  <i class="fi fi-rr-question-square"></i>
  Question
</a>

<a class="btn w-full justify-start" href="{{route('mark')}}" id="marks">
  <i class="fi fi-rr-memo-circle-check"></i>
  Answers & Marks
</a>

<a class="btn w-full justify-start" href="{{ route('news-event') }}" id="news-event">
  <i class="fi fi-rr-calendar-star"></i>
  News and events
</a>

<script>
  document.addEventListener("DOMContentLoaded", function () {
      var currentPath = window.location.pathname;

      var urlToMenuIdMap = {
          '/': 'home',
          '/class': 'routines',
          '/exam': 'exam',
          '/question': 'question',
          '/mark': 'marks',
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
