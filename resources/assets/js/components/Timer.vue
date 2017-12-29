<template>
    <div class="column is-6 is-4-tablet is-4-fullhd">
        <div  class="timer octovine">
            <div class="boss">
                <span class="event">Tequalt the Sunless</span>
                <span class="description">Auric Basin</span>
                <div class="left">
                    15:22
                </div>
            </div>
            <div class="panel">
                <span class="start">
                    20 minutes ago
                </span>
                <span class="end">
                    Reset in 12 minutes
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
    }
  },
  data() {
    return {
    };
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
