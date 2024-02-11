<?php
class Calendar
{
  private $active_year, $active_month, $active_day, $today;
  private $events = [];

  public function __construct($date = null)
  {
    $this->active_year = $date != null ? date('Y', strtotime($date)) : date('Y');
    $this->active_month = $date != null ? date('m', strtotime($date)) : date('m');
    $this->active_day = $date != null ? date('d', strtotime($date)) : date('d');
    $this->today = strtotime('now');
  }

  public function add_event($id, $date, $days = 1)
  {
    $this->events[] = [$id, $date, $days];
  }

  public function __toString()
  {
    $num_days = date('t', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year));
    $num_days_last_month = date('j', strtotime('last day of previous month', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year)));
    $days = [0 => 'Mon', 1 => 'Tue', 2 => 'Wed', 3 => 'Thu', 4 => 'Fri', 5 => 'Sat', 6 => 'Sun'];
    $first_day_of_week = array_search(date('D', strtotime($this->active_year . '-' . $this->active_month . '-1')), $days);
    $html = '<div id="calendar" class="calendar-dates relative">';
    $html .= '<div class="header">';
    $html .= '<h4 class="month-year">';
    $html .= date('F Y', strtotime($this->active_year . '-' . $this->active_month . '-' . $this->active_day));
    $html .= '</h4>';
    $html .= '</div>';
    $html .= '<div class="days">';
    foreach ($days as $day) {
      $html .= '
        <div class="day_name">
          ' . substr($day, 0, 2) . '
        </div>
      ';
    }
    $total_days = 0;
    for ($i = $first_day_of_week; $i > 0; $i--) {
      $html .= '
        <div class="day_num ignore">
          ' . ($num_days_last_month - $i + 1) . '
        </div>
      ';
      $total_days++;
    }
    for ($i = 1; $i <= $num_days; $i++) {
      $selected = '';
      if ($i == $this->active_day) {
        $selected = ' selected';
      }
      $calDate = date('y-m-d', strtotime($this->active_year . '-' . $this->active_month . '-' . $i));
      $isToday = date('y-m-d', $this->today) == $calDate ? ' today' : '';
      $post_ids = [];
      foreach ($this->events as $event) {
        for ($d = 0; $d <= ($event[2] - 1); $d++) {
          if (date('y-m-d', strtotime($this->active_year . '-' . $this->active_month . '-' . $i . ' -' . $d . ' day')) == date('y-m-d', strtotime($event[1]))) {
            array_push($post_ids, $event[0]);
          }
        }
      }
      $event_ids = implode(',', $post_ids);
      $html .= '<div class="day_num' . $selected . $isToday . '" data-event-ids="' . $event_ids . '">';
      $html .= '<span data-event-ids="' . $event_ids . '">' . $i . '</span>';
      if ($post_ids) {
        $html .= '<div class="has-events" data-event-ids="' . $event_ids . '"></div>';
      }
      $html .= '</div>';
      $total_days++;
    }
    $limit = $total_days > 35 ? 42 : 35;
    for ($i = 1; $i <= ($limit - $num_days - max($first_day_of_week, 0)); $i++) {
      $html .= '
        <div class="day_num ignore">
          ' . $i . '
        </div>
      ';
    }
    $html .= '</div>';
    $html .= '</div>';
    return $html;
  }
}
