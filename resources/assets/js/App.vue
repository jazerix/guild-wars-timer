<template>
    <div>
        <nav style="background-color:#b1120e;" class="nav-extended">
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo">GW2 Timers</a>
            </div>
        </nav>
        <main>
            <div class="parallax-container">
                <div ref="balzahar" class="parallax"><img src="/imgs/balthazar.jpg"></div>
            </div>
            <div class="container">
                
            <ul class="tabs">
                <li class="tab col s3"><a class="active" href="">All</a></li>
                <li class="tab col s3"><a href="">World Bosses</a></li>
                <li class="tab col s3"><a href="">Auric Basin</a></li>
                <li class="tab col s3"><a href="">Dry Top</a></li>
            </ul>
            </div>
            <div class="section white">
                <div class="container row">
                    <h3 style="color:#b1120e;margin-top:0px" class="header">Active Events</h3>
    <div class="row">
                    <timer name="Fire Elemental"></timer>
                    <timer name="Fire Elemental"></timer>
                    <timer name="Fire Elemental"></timer>
                    <timer name="Fire Elemental"></timer>
                    <timer name="Fire Elemental"></timer>
                    <timer name="Fire Elemental"></timer>
                    <timer name="Fire Elemental"></timer>
    </div>
                </div>
            </div>
            
        </main>
    </div>
</template>

<script>

export default {
  name: 'app',
  mounted: function() {
      $('.parallax').parallax();
  }
}
</script>

<style>
.parallax-container {
      height: 160px;
    }
</style>


