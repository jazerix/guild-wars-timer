<template>
  <div class="column is-6 is-4-tablet is-4-fullhd">
    <div class="timer" :class="tag">
      <div class="boss">
        <span class="event">
          <a target="_blank" :href="wiki">{{ name }}</a>
        </span>
        <span class="description">{{ location }}</span>
        <div class="left">
          {{ countdown }}
        </div>
      </div>
      <div class="panel">
        <span class="start">
          {{ event.active ? 'Next' : 'Starts' }} at {{ next.time | time }}
        </span>
        <span class="end">
          <span>{{ upcoming }}</span>
          <ul>
            <li>
              <a href="#">
                <i class="fa fa-bell" aria-hidden="true"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
              </a>
            </li>
            <li :class="{ 'favorite': favorite }">
              <a @click="favorite = !favorite">
                <i v-if="favorite" class="fa fa-star" aria-hidden="true"></i>
                <i v-if="!favorite" class="fa fa-star-o" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "timer",
  props: {
    name: {
      type: String
    },
    wiki: {
      type: String
    },
    tag: {
      type: String
    },
    location: {
      type: String
    },
    times: {
      type: Array
    },
    duration: {
      type: Number
    },
    id: {
      type: Number
    }
  },
  data() {
    return {
      next: {
        time: null,
        string: "",
        soon: false,
        left: null
      },
      nextString: "",
      favorite: false,
      event: {
        active: false,
        time: 0
      }
    };
  },
  computed: {
    countdown() {
      if (this.event.active) {
        var seconds = this.event.time % 60;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        return Math.floor(this.event.time / 60) + ":" + seconds;
      }
      return this.next.soon ? "Soon" : "Ended";
    },
    upcoming() {
      if (this.event.active) {
        return "currently in progress";
      }
      return this.next.string;
    }
  },
  mounted() {
    this.currentlyHappening();
    this.nextTime();
  },
  methods: {
    currentlyHappening() {
      var hour = this.$parent.time.hour;
      var minute = this.$parent.time.minute;
      var second = this.$parent.time.second;
      var dt = new Date();
      dt.setHours(hour, minute, second);
      dt.setTime(dt.getTime() - 60000 * this.duration);

      var current = this.findEvent(dt.getHours(), dt.getMinutes());
      var currentTime = new Date();
      currentTime.setUTCHours(current.hour, current.minute, 0);
      var currentTimeEnd = new Date(
        currentTime.getTime() + 60000 * this.duration
      );

      var time = new Date();
      time.setUTCHours(hour, minute, second);

      if (
        time.getTime() >= currentTime.getTime() &&
        time.getTime() <= currentTimeEnd.getTime()
      ) {
        this.event.active = true;
        this.event.time = Math.floor(
          (currentTimeEnd.getTime() - time.getTime()) / 1000
        );
      } else this.event.active = false;
    },

    findEvent(hour, minute) {
      var event = null;
      this.times.forEach(function(time) {
        if (event != null) return;
        time = time.split(":");
        var tHour = parseInt(time[0]);
        var tMinute = parseInt(time[1]);

        if (hour < tHour || (hour == tHour && minute < tMinute)) {
          event = {
            hour: tHour,
            minute: tMinute
          };
          return;
        }
      });

      if (event == null) {
        var time = this.times[0].split(":");
        var tHour = parseInt(time[0]);
        var tMinute = parseInt(time[1]);
        event = {
          hour: tHour,
          minute: tMinute
        };
      }

      return event;
    },
    nextTime() {
      var hour = this.$parent.time.hour;
      var minute = this.$parent.time.minute;
      this.next.time = this.findEvent(hour, minute);
      this.next.string = this.getNextString();
    },
    getTimeTilNext() {
      var hour = this.next.time.hour - this.$parent.time.hour;
      var minute = this.next.time.minute - this.$parent.time.minute;
      if (minute < 0) {
        minute += 60;
        hour--;
      }
      if (hour < 0) {
        hour += 23;
      }
      return {
        hour: hour,
        minute: minute
      };
    },
    getNextString() {
      var time = this.getTimeTilNext();
      this.next.soon = time.hour < 1 && time.minute <= 15;
      this.next.left = time.hour * 60 + time.minute;

      if (time.hour > 0)
        return (
          "in " +
          time.hour +
          " hour" +
          (time.hour == 1 ? "" : "s") +
          ", " +
          time.minute +
          " minute" +
          (time.minute == 1 ? "" : "s")
        );
      return "in " + time.minute + " minute" + (time.minute == 1 ? "" : "s");
    }
  },
  filters: {
    time: function(t) {
      if (t == null) return "";
      let form = new Date();
      form.setUTCHours(t.hour);
      form.setUTCMinutes(t.minute);
      let hour = form.getHours() < 10 ? "0" + form.getHours() : form.getHours();
      let minute =
        form.getMinutes() < 10 ? "0" + form.getMinutes() : form.getMinutes();
      return hour + ":" + minute;
    }
  }
};
</script>
