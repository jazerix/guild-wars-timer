<template>
    <div>
        <nav class="navbar is-primary is-transparent has-shadow">
            <div class="container">
                <div class="navbar-brand">
                    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div id="navbarExampleTransparentExample" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="">
                            {{ time.hour }}:{{ time.minute }}:{{ time.second }}
                        </a>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="/documentation/overview/start/">
                                Docs
                            </a>
                            <div class="navbar-dropdown is-boxed">
                                <a class="navbar-item" href="/documentation/overview/start/">
                                    Overview
                                </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
                                    Modifiers
                                </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">
                                    Columns
                                </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/layout/container/">
                                    Layout
                                </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/form/general/">
                                    Form
                                </a>
                                <hr class="navbar-divider">
                                <a class="navbar-item" href="https://bulma.io/documentation/elements/box/">
                                    Elements
                                </a>
                                <a class="navbar-item is-active" href="https://bulma.io/documentation/components/breadcrumb/">
                                    Components
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="navbar-end">
                        <div class="navbar-item">
                            <a class="button is-link">
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
        <section style="background-image: url(/imgs/balthazar.jpg);" class="hero is-primary">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Hero title
                    </h1>
                    <h2 class="subtitle">
                        Hero subtitle
                    </h2>
                </div>
            </div>
        </section>
        <nav class="navbar has-shadow">
            <div class="container">
                <div class="navbar-tabs">
                    <a class="navbar-item is-tab is-active" href="https://bulma.io/documentation/layout/container/">
                        All
                    </a>
                    <a class="navbar-item is-tab" href="https://bulma.io/documentation/layout/level/">
                        World Bosses
                    </a>
                    <a class="navbar-item is-tab" href="https://bulma.io/documentation/layout/level/">
                        Heart of Thorns
                    </a>
                    <a class="navbar-item is-tab" href="https://bulma.io/documentation/layout/level/">
                        Path of Fire
                    </a>
                </div>
            </div>
        </nav>
        <section class="section">
            <div class="container">
                <h1 class="title">Happening now...</h1>
                <div class="columns is-multiline">
                    <timer v-for="event in now" @minutes="updateMinutesLeft" :id="event.id" :key="event.id" :name="event.name" :tag="event.class" :times="event.times" :wiki="event.wiki_link" :location="event.location" :duration="event.duration" />
                </div>
                <h1 class="title">Soon...</h1>
                <h1 class="title">Later...</h1>
                <div class="columns is-multiline"> </div>

            </div>
        </section>
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
        second: new Date().getUTCSeconds()
      }
    };
  },
  computed: {
    now: function() {
      /*return _.filter(this.events, function(event){
              return event.minutes_til_next < 80;
          });*/
      //return _.orderBy(this.events, 'minutes_til_next');
    }
  },
  mounted: function() {
    setInterval(
      function() {
        var d = new Date();
        this.time.hour = d.getUTCHours();
        this.time.minute = d.getUTCMinutes();
        this.time.second = d.getUTCSeconds();
        this.events.forEach(
          function(event) {
            if (event.status.active) {
              event.cooldown--;
              if (event.cooldown == 0) {
                event.status.active = false;
                event.status.cooldown = null;
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
    this.all();
  },
  methods: {
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
    findNextEvent(event, hour, minute) {
      var next = null;
      event.times.forEach(function(time) {
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
        var time = event.times[0].split(":");
        var tHour = parseInt(time[0]);
        var tMinute = parseInt(time[1]);
        next = {
          hour: tHour,
          minute: tMinute
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
        hour += 23;
      }
      return {
        hour: hour,
        minute: minute,
        total_minute: hour * 60 + minute
      };
    },
    currentlyHappening(event) {
      var hour = this.time.hour;
      var minute = this.time.minute;
      var second = this.time.second;
      var dt = new Date();
      dt.setHours(hour, minute, second);
      dt.setTime(dt.getTime() - 60000 * this.duration);

      var current = this.findNextEvent(event, dt.getHours(), dt.getMinutes());
      var currentTime = new Date();
      currentTime.setUTCHours(current.hour, current.minute, 0);
      var currentTimeEnd = new Date(
        currentTime.getTime() + 60000 * event.duration
      );

      var time = new Date();
      time.setUTCHours(hour, minute, second);

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


