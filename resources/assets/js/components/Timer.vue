<template>
    <div class="column is-6 is-4-tablet is-4-fullhd">
        <div class="timer" :class="tag">
            <div class="boss">
                <span class="event">Tequalt the Sunless</span>
                <span class="description">{{ location }}</span>
                <div class="left">
                    15:22
                </div>
            </div>
            <div class="panel">
                <span class="start">
                    20 minutes ago
                </span>
                <span class="end">
                    <span>{{ nextString }}</span>
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
    }
  },
  data() {
    return {
      next: null,
      nextString: "",
      favorite: false
    };
  },
  computed: {},
  mounted() {
    this.nextTime();
  },
  watch: {
    "$parent.time.second": function(second) {
      var time = this.$parent.time;
      if (second == 0) this.nextString = this.getNextString();
    }
  },
  methods: {
    nextTime() {
      var dt = new Date();

      var hour = this.$parent.time.hour;
      var minute = this.$parent.time.minute;
      var next = null;

      this.times.forEach(function(time) {
        if (next != null) return;
        time = time.split(":");
        var tHour = parseInt(time[0]);
        var tMinute = parseInt(time[1]);

        if (hour < tHour || (hour == tHour && minute < tMinute)) {
          next = {
            hour: tHour,
            minute: tMinute
          };
          return;
        }
      });

      if (next == null) {
        var time = this.times[0].split(":");
        var tHour = parseInt(time[0]);
        var tMinute = parseInt(time[1]);
        next = {
          hour: tHour,
          minute: tMinute
        };
      }
      this.next = next;
      this.nextString = this.getNextString();
    },
    getNextString() {
      var hour = this.next.hour - this.$parent.time.hour;
      var minute = this.next.minute - this.$parent.time.minute;
      if (minute < 0) {
        minute += 60;
        hour--;
      }
      if (hour < 0) {
        hour += 23;
      }

      if (hour > 0) return "in " + hour + " hours and " + minute + " minute";
    }
  }
};
</script>
