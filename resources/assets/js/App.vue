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
                <p class="control" v-text="lunar.day ? 'Day' : 'Night'"></p>
                <p class="control">
                  <progress class="progress is-small" style="width:100px;position: relative;top: 50%;transform: translateY(-50%);" :value="lunar.percentage" max="100">{{ lunar.percentage }}%</progress>
                </p>
                <p class="control" v-text="lunar.day ? 'Night' : 'Day'"></p>
              </div>
              <div class="navbar-dropdown is-boxed">
                <div class="navbar-item">
                  <div>
                    <small>
                      {{ lunar.day ? 'Day' : 'Night' }} ends in <b>{{ lunar.left }}</b> minutes
                    </small>
                  </div>
                </div>
              </div>
            </div>
            <a class="navbar-item">
              API
            </a>
          </div>
        </div>
      </div>
    </nav>
    <section class="hero balthazar is-primary">
    </section>
    <nav class="navbar has-shadow">
      <div class="container">
        <div class="navbar-tabs">
          <a v-if="favoriteCount > 0" @click="category = 'favorites'" class="navbar-item is-tab" :class="{ 'is-active': category == 'favorites' }">
            Favorites
          </a>
          <a @click="category = 'all'" class="navbar-item is-tab" :class="{ 'is-active': category == 'all' }">
            All
          </a>
          <a @click="category = 'world'" class="navbar-item is-tab" :class="{ 'is-active': category == 'world' }">
            World Bosses
          </a>
          <a @click="category = 'classic'" class="navbar-item is-tab" :class="{ 'is-active': category == 'classic' }">
            Classic
          </a>
          <a @click="category = 'hot'" class="navbar-item is-tab" :class="{ 'is-active': category == 'hot' }">
            Heart of Thorns
          </a>
          <a @click="category = 'pof'" class="navbar-item is-tab" :class="{ 'is-active': category == 'pof' }">
            Path of Fire
          </a>
        </div>
      </div>
    </nav>
    <section class="section">
      <div class="container">
        <h1 v-show="now.length > 0" class="title">Happening now...</h1>
        <div class="columns is-multiline">
          <timer @notification="notify" @favorite="toggleFavorite(event, $event)" v-for="event in now" :key="event.id" :states="event.has_states" :tag="event.class" :favorite="event.favorite" :name="event.name" :wiki="event.wiki_link" :waypoint="event.waypoint_link" :location="event.location" :status="event.status" :next="event.next" />
        </div>
        <h1 v-show="soon.length > 0" class="title">Soon...</h1>
        <div class="columns is-multiline">
          <timer @notification="notify" @favorite="toggleFavorite(event, $event)" v-for="event in soon" :key="event.id" :states="event.has_states" :tag="event.class" :favorite="event.favorite" :name="event.name" :wiki="event.wiki_link" :waypoint="event.waypoint_link" :location="event.location" :status="event.status" :next="event.next" />
        </div>
        <h1 v-show="later.length > 0" class="title">Later...</h1>
        <div class="columns is-multiline">
          <timer @notification="notify" @favorite="toggleFavorite(event, $event)" v-for="event in later" :key="event.id" :states="event.has_states" :tag="event.class" :favorite="event.favorite" :name="event.name" :wiki="event.wiki_link" :waypoint="event.waypoint_link" :location="event.location" :status="event.status" :next="event.next" />
        </div>
      </div>
    </section>
    <footer class="footer">
      <div class="container">
        <div class="content has-text-centered">
          <p>
            <strong>Live GW2</strong> by
            <a target="_blank" href="https://www.linkedin.com/in/nielsfaurskov/">Niels Faurskov</a>. The source code can be found
            <a target="_blank" href="https://github.com/jazerix/guild-wars-timer">here</a>. Contact me at
            <a href="mailto:niels.faurskov@gmail.com">niels.faurskov@gmail.com</a> or ingame
            <b>jazerix.7842</b>.
          </p>
        </div>
      </div>
    </footer>
    <transition name="fade">
      <div v-if="notification.display" class="notification is-primary popup-notification">
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
      notification: {
        display: false,
        text: ""
      },
      lunar: {
        day: true,
        percentage: 0,
        left: 0
      },
      sorting: "fa-sort-numeric-asc",
      category: "all",
      favoriteCount: 0
    };
  },
  computed: {
    now: function() {
      let results = _.chain(this.events)
        .filter(
          function(event) {
            if (this.category == "all") return event.status.active == true;
            if (this.category == "favorites") {
              return event.status.active == true && event.favorite == true;
            }
            return event.status.active == true && this.category == event.type;
          }.bind(this)
        )
        .orderBy(
          function(event) {
            return this.sorting.split("-")[2] == "numeric"
              ? event.status.cooldown
              : event.name;
          }.bind(this),
          this.sorting.split("-")[3]
        )
        .value();
      return results;
    },
    soon: function() {
      return _.chain(this.events)
        .filter(
          function(event) {
            if (this.category == "all")
              return event.next.total_minute <= 15 && !event.status.active;
            if (this.category == "favorites") {
              return (
                event.next.total_minute <= 15 &&
                !event.status.active &&
                event.favorite == true
              );
            }
            return (
              event.next.total_minute <= 15 &&
              !event.status.active &&
              this.category == event.type
            );
          }.bind(this)
        )
        .orderBy(
          function(event) {
            return this.sorting.split("-")[2] == "numeric"
              ? event.next.total_minute
              : event.name;
          }.bind(this),
          this.sorting.split("-")[3]
        )
        .value();
    },
    later: function() {
      return _.chain(this.events)
        .filter(
          function(event) {
            if (this.category == "all")
              return event.next.total_minute > 15 && !event.status.active;
            if (this.category == "favorites") {
              return (
                event.next.total_minute > 15 &&
                !event.status.active &&
                event.favorite == true
              );
            }
            return (
              event.next.total_minute > 15 &&
              !event.status.active &&
              this.category == event.type
            );
          }.bind(this)
        )
        .orderBy(
          function(event) {
            return this.sorting.split("-")[2] == "numeric"
              ? event.next.total_minute
              : event.name;
          }.bind(this),
          this.sorting.split("-")[3]
        )
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
                  if (event.next.at.location != null) {
                    this.setLocation(
                      event,
                      event.next.at.location,
                      event.next.at.waypoint
                    );
                  }
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
                if (event.has_states) this.currentlyHappening(event);
                if (!event.status.active) {
                  event.status.active = true;
                  event.status.cooldown = event.duration * 60;
                }
              }
              this.getLunarState();
            }
          }.bind(this)
        );
      }.bind(this),
      1000
    );
    this.getLunarState()
  },
  methods: {
    toggleFavorite(event, favored) {
      let favorites = localStorage.getItem("favorites");
      if (favorites == null) favorites = [];
      else favorites = JSON.parse(favorites);
      if (favored) favorites.push(event.id);
      else favorites.splice(favorites.indexOf(event.id), 1);

      localStorage.setItem("favorites", JSON.stringify(favorites));

      if (favored) this.favoriteCount++;
      else this.favoriteCount--;
      event.favorite = favored;
    },
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
    notify(text) {
      this.notification.text = text;
      this.notification.display = true;
      setTimeout(
        function() {
          this.notification.display = false;
        }.bind(this),
        3000
      );
    },
    toggleMenu() {
      this.$refs.burger.classList.toggle("is-active");
      this.$refs.navbar.classList.toggle("is-active");
    },
    all() {
      axios.get("/api/events").then(
        function(response) {
          let favorites = localStorage.getItem("favorites");
          if (favorites != null) favorites = JSON.parse(favorites);
          else favorites = [];
          response.data.forEach(function(event) {
            event.favorite = favorites.includes(event.id);
          });
          this.favoriteCount = favorites.length;
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
      if (i == 0 || i == null) i = event.times.length;
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
            state: time.state,
            location: time.location,
            waypoint: time.waypoint
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
          state: event.times[0].state,
          location: event.times[0].location,
          waypoint: event.times[0].waypoint
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
          state: next.state,
          location: next.location,
          waypoint: next.waypoint
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

        if (time.getDate() != endTime.getDate())
          time.setTime(time.getTime() + 86400000);

        if (endTime.getTime() <= time.getTime()) {
          event.status.name = "Inactive";
          event.name = event.status.name;
          event.status.cooldown = null;
          event.status.active = false;
        } else {
          event.status.name = current.state;
          event.name = event.status.name;
          event.status.active = true;
          event.status.cooldown = Math.floor(
            (endTime.getTime() - time.getTime()) / 1000
          );
        }

        if (event.waypoint_link == null)
          this.setLocation(event, event.location, current.waypoint);

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
      if (current.location != null) {
        this.setLocation(event, current.location, current.waypoint);
      }
    },
    setLocation(event, location, waypoint) {
      event.location = location;
      event.waypoint_link = waypoint;
    },
    getLunarState() {
      let odd = this.time.hour % 2 == 1;
      let day = false;
      let started = '';
      let elapsed = '';

      if ( ! odd && this.time.minute >= 30) {
        day = true;
        elapsed = this.time.minute - 30;
        started = this.time.hour + ':30';
      } else if ( ! odd && this.time.minute < 30) {
        elapsed = this.time.minute + 15;
        let hour = (this.time.hour + 23) % 24;
        started = hour + ':45';
      } else if (odd && this.time.minute < 45) {
        day = true;
        elapsed = 60 + this.time.minute - 30;
        let hour = (this.time.hour + 23) % 24;
        started = hour + ':30';
      } else if (odd && this.time.minute >= 45) {
        elapsed = this.time.minute - 45;
        started = this.time.hour + ':45';
      }
      
      let duration = (day ? 75 : 45);
      this.lunar = {
        day: day,
        elapsed: elapsed,
        left: duration - elapsed,
        start: started,
        duration: duration,
        percentage: Math.round(elapsed / duration * 100)
      };
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

.is-tab {
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
</style>