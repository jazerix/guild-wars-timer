<template>
  <div>
    <nav class="navbar is-primary has-shadow">
      <div class="container">
        <div class="navbar-brand">
          <span class="navbar-item is-pulled-right" href="https://bulma.io">
            <b>Live GW2</b>
          </span>
          <div @click="toggleMenu()" ref="burger" class="navbar-burger">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div ref="navbar" class="navbar-menu">

          <div class="navbar-end">
            <div class="navbar-item">
              <a @click="switchSort()" class="button is-link is-flex-touch">
                <span class="icon is-small">
                  <i class="fa" :class="sorting"></i>
                </span>
              </a>
            </div>
            <div class="navbar-item">
              <a class="button is-link is-flex-touch">
                <span class="icon is-small">
                  <i class="fa fa-cog"></i>
                </span>
              </a>
            </div>
            <div class="navbar-item">
              <a class="button is-link is-flex-touch">
                <span class="icon is-small">
                  <i class="fa fa-bell"></i>
                </span>
              </a>
            </div>
            <div class="navbar-item is-hoverable">
              <div class="field is-grouped" style="margin:0px;">
                <p class="control">
                  Day
                </p>
                <p class="control">
                  <progress class="progress is-small" style="width:100px;position: relative;top: 50%;transform: translateY(-50%);" value="15" max="100">15%</progress>
                </p>
                <p class="control">
                  Night
                </p>
              </div>
              <div class="navbar-dropdown is-boxed">
                <div class="navbar-item">
                  <div>
                    <small>
                      Day ends in 20 minutes
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <section class="hero balthazar is-primary">
    </section>
    <nav class="navbar has-shadow">
      <div class="container">
        <div class="navbar-tabs">
          <a class="navbar-item is-tab is-active">
            All
          </a>
          <a class="navbar-item is-tab">
            World Bosses
          </a>
          <a class="navbar-item is-tab">
            Classic
          </a>
          <a class="navbar-item is-tab">
            Heart of Thorns
          </a>
          <a class="navbar-item is-tab">
            Path of Fire
          </a>
        </div>
      </div>
    </nav>
    <section class="section">
      <div class="container">
        <h1 class="title">Happening now...</h1>
        <div class="columns is-multiline">
          <timer @copied="copyNotification()" v-for="event in now" :key="event.id" :states="event.has_states" :tag="event.class" :name="event.name" :wiki="event.wiki_link" :waypoint="event.waypoint_link" :location="event.location" :status="event.status" :next="event.next" />
        </div>
        <h1 class="title">Soon...</h1>
        <div class="columns is-multiline">
          <timer @copied="copyNotification()" v-for="event in soon" :key="event.id" :states="event.has_states" :tag="event.class" :name="event.name" :wiki="event.wiki_link" :waypoint="event.waypoint_link" :location="event.location" :status="event.status" :next="event.next" />
        </div>
        <h1 class="title">Later...</h1>
        <div class="columns is-multiline">
          <timer @copied="copyNotification()" v-for="event in later" :key="event.id" :states="event.has_states" :tag="event.class" :name="event.name" :wiki="event.wiki_link" :waypoint="event.waypoint_link" :location="event.location" :status="event.status" :next="event.next" />
        </div>
      </div>
    </section>
    <transition name="fade">
      <div v-if="copied" class="notification is-primary popup-notification">
        Successfully copied waypoint to clipboard.
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  name: "app",
  data() {
    return {
      events: [],
      time: {
        hour: new Date().getUTCHours(),
        minute: new Date().getUTCMinutes(),
        second: new Date().getUTCSeconds(),
        timestamp: new Date().getTime()
      },
      copied: false,
      sorting: "fa-sort-numeric-asc"
    };
  },
  computed: {
    now: function() {
      return _.chain(this.events)
        .filter(function(event) {
          return event.status.active == true;
        })
        .orderBy(function(event) {
          return event.status.cooldown;
        })
        .value();
    },
    soon: function() {
      return _.chain(this.events)
        .filter(function(event) {
          return event.next.total_minute <= 15 && !event.status.active;
        })
        .orderBy(function(event) {
          return event.next.total_minute;
        })
        .value();
    },
    later: function() {
      return _.chain(this.events)
        .filter(function(event) {
          return event.next.total_minute > 15 && !event.status.active;
        })
        .orderBy(function(event) {
          return event.next.total_minute;
        })
        .value();
    }
  },
  mounted: function() {
    this.all();
    setInterval(
      function() {
        var d = new Date();
        this.time.hour = d.getUTCHours();
        this.time.minute = d.getUTCMinutes();
        this.time.second = d.getUTCSeconds();
        let newTime = d.getTime();
        if (newTime / 1000 - this.time.timestamp / 1000 > 5)
          //out of sync
          this.startUp();
        this.time.timestamp = newTime;
        this.events.forEach(
          function(event) {
            if (event.status.active) {
              if (event.status.cooldown > 0) event.status.cooldown--;
              if (event.status.cooldown == 0) {
                if (!event.has_states) {
                  event.status.active = false;
                  event.status.cooldown = null;
                }
              }
            }
            if (this.time.second == 0) {
              if (event.next.total_minute > 1) {
                if (event.next.minute == 0) {
                  event.next.hour--;
                  event.next.minute = 59;
                } else event.next.minute--;
                event.next.total_minute--;
              } else {
                event.next = this.timeTilNext(event);
                if (event.has_states)
                  this.currentlyHappening(event);
                if (!event.status.active) {
                  event.status.active = true;
                  event.status.cooldown = event.duration * 60;
                }
              }
            }
          }.bind(this)
        );
      }.bind(this),
      1000
    );
  },
  methods: {
    switchSort() {
      switch (this.sorting) {
        case "fa-sort-numeric-asc":
          this.sorting = "fa-sort-numeric-desc";
          break;
        case "fa-sort-numeric-desc":
          this.sorting = "fa-sort-alpha-asc";
          break;
        case "fa-sort-alpha-asc":
          this.sorting = "fa-sort-alpha-desc";
          break;
        case "fa-sort-alpha-desc":
          this.sorting = "fa-sort-numeric-asc";
          break;
      }
    },
    copyNotification() {
      this.copied = true;
      setTimeout(
        function() {
          this.copied = false;
        }.bind(this),
        3000
      );
    },
    toggleMenu() {
      this.$refs.burger.classList.toggle("is-active");
      this.$refs.navbar.classList.toggle("is-active");
    },
    all() {
      axios.get("/events").then(
        function(response) {
          this.events = response.data;
          this.startUp();
        }.bind(this)
      );
    },
    startUp() {
      this.events.forEach(
        function(event) {
          event.next = this.timeTilNext(event);
          this.currentlyHappening(event);
        }.bind(this)
      );
    },
    currentState(event, hour, minute) {
      let i = null;
      event.times.forEach(function(time, index) {
        if (i != null) return;
        time = time.time_at.split(":");
        var tHour = parseInt(time[0]);
        var tMinute = parseInt(time[1]);
        if (hour < tHour || (hour == tHour && minute < tMinute)) {
          i = index;
          return;
        }
      });
      if (i == 0) i = event.times.length;
      return event.times[i - 1];
    },
    findNextEvent(event, hour, minute) {
      var next = null;
      event.times.forEach(function(time) {
        if (next != null) return;
        var time_at = time.time_at.split(":");
        var tHour = parseInt(time_at[0]);
        var tMinute = parseInt(time_at[1]);

        if (hour < tHour || (hour == tHour && minute < tMinute)) {
          next = {
            hour: tHour,
            minute: tMinute,
            duration: time.duration,
            state: time.state
          };
          return;
        }
      });

      if (next == null) {
        var time_at = event.times[0].time_at.split(":");
        var tHour = parseInt(time_at[0]);
        var tMinute = parseInt(time_at[1]);
        next = {
          hour: tHour,
          minute: tMinute,
          duration: event.times[0].duration,
          state: event.times[0].state
        };
      }

      return next;
    },
    timeTilNext(event) {
      let next = this.findNextEvent(event, this.time.hour, this.time.minute);
      let hour = next.hour - this.time.hour;
      let minute = next.minute - this.time.minute;
      if (minute < 0) {
        minute += 60;
        hour--;
      }
      if (hour < 0) {
        hour += 24;
      }
      return {
        hour: hour,
        minute: minute,
        total_minute: hour * 60 + minute,
        at: {
          hour: next.hour,
          minute: next.minute,
          duration: next.duration,
          state: next.state
        }
      };
    },
    currentlyHappening(event) {
      var hour = this.time.hour;
      var minute = this.time.minute;
      var second = this.time.second;
      var time = new Date();
      time.setUTCHours(hour, minute, second);

      if (event.has_states) {
        let current = this.currentState(event, hour, minute);
        let currentTime = current.time_at.split(":");
        let endTime = new Date();
        endTime.setUTCHours(currentTime[0], currentTime[1], 0);
        endTime = new Date(endTime.getTime() + current.duration * 60000);

        event.status.name = current.state;
        event.status.active = true;
        event.status.cooldown = Math.floor(
          (endTime.getTime() - time.getTime()) / 1000
        );
        return;
      }
      var dt = new Date();
      dt.setHours(hour, minute, second);
      dt.setTime(dt.getTime() - 60000 * event.duration);

      var current = this.findNextEvent(event, dt.getHours(), dt.getMinutes());
      var currentTime = new Date();
      currentTime.setUTCHours(current.hour, current.minute, 0);
      var currentTimeEnd = new Date(
        currentTime.getTime() + 60000 * event.duration
      );

      if (
        time.getTime() >= currentTime.getTime() &&
        time.getTime() <= currentTimeEnd.getTime()
      ) {
        event.status.active = true;
        event.status.cooldown = Math.floor(
          (currentTimeEnd.getTime() - time.getTime()) / 1000
        );
      } else {
        event.status.active = false;
        event.status.cooldown = null;
      }
    }
  }
};
</script>

<style>
.balthazar {
  background-image: url(/imgs/balthazar.jpg);
  background-position: 50% 22%;
  height: 120px;
}

.popup-notification {
  position: fixed;
  right: 10px;
  bottom: 10px;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.25s ease-out;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>