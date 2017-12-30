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
                        <a class="navbar-item" href="https://bulma.io/">
                            Home
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
                    <timer v-for="event in events" :key="event.id" :name="event.name" :tag="event.class" :times="event.times" :location="event.location" :duration="event.duration" />
                </div>
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
      }
  },
  methods: {
      all() {
          axios.get('/events')
          .then(function(response) {
              this.events = response.data;
          }.bind(this));
      }
  },
  mounted: function() {
      setInterval(function() {
      var d = new Date();
          this.time.hour =  d.getUTCHours();
          this.time.minute = d.getUTCMinutes();
          this.time.second = d.getUTCSeconds();
      }.bind(this), 1000);
      this.all();
  }
};
</script>


