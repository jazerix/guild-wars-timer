<template>
    <div class="column is-3">
        <div class="card">
            <div class="card-image">
                <figure class="image is-16by9">
                    <img src="/imgs/fire_elemental.jpg" alt="Placeholder image">
                </figure>
            </div>
            <header class="card-header">
                <p class="card-header-title">
                    Fire Elemental
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <p style="text-align:center;font-size:32px;color:#b1120e">15:30</p>
            </div>
            <footer class="card-footer">
                <div class="card-footer-item">
                    <img style="height:24px;width:24px;vertical-align:middle" src="/imgs/waypoint.png" />
                    <a href="#">Metrica Province</a>
                </div>
            </footer>
            <div class="card-action">
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
    }
  },
  data() {
    return {};
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
