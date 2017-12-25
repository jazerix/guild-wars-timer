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
                            <div class="field is-grouped">
                                <p class="control">
                                    <a class="bd-tw-button button" data-social-network="Twitter" data-social-action="tweet" data-social-target="http://localhost:4000" target="_blank" href="https://twitter.com/intent/tweet?text=Bulma: a modern CSS framework based on Flexbox&amp;hashtags=bulmaio&amp;url=http://localhost:4000&amp;via=jgthms">
                                        <span class="icon">
                                            <i class="fa fa-twitter"></i>
                                        </span>
                                        <span>
                                            Tweet
                                        </span>
                                    </a>
                                </p>
                                <p class="control">
                                    <a class="button is-primary" href="https://github.com/jgthms/bulma/archive/0.5.1.zip">
                                        <span class="icon">
                                            <i class="fa fa-download"></i>
                                        </span>
                                        <span>Download</span>
                                    </a>
                                </p>
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
                    <a class="navbar-item is-tab" href="https://bulma.io/documentation/layout/media-object/">
                        Dry Top
                    </a>
                    <a class="navbar-item is-tab " href="https://bulma.io/documentation/layout/hero/">
                        Verdant Brink
                    </a>
                    <a class="navbar-item is-tab " href="https://bulma.io/documentation/layout/section/">
                        Auric Basin
                    </a>
                    <a class="navbar-item is-tab " href="https://bulma.io/documentation/layout/footer/">
                        Tangled Depths
                    </a>
                    <a class="navbar-item is-tab" href="#">
                        Dragons Stand
                    </a>
                    <a class="navbar-item is-tab" href="#">
                        Lake Doric
                    </a>
                    <a class="navbar-item is-tab" href="#">
                        Lay-Line Anomaly
                    </a>
                    <a class="navbar-item is-tab" href="#">
                        Crystal Oasis
                    </a>
                    <a class="navbar-item is-tab" href="#">
                        Desert Highlands
                    </a>
                    <a class="navbar-item is-tab" href="#">
                        Domain of Vabbi
                    </a>
                </div>
            </div>
        </nav>
        <section class="section">
            <div class="container">

                <h1 class="title">Active Events</h1>
                <div class="columns is-multiline">
                    <timer/>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
  name: "app",
  mounted: function() {}
};
</script>


