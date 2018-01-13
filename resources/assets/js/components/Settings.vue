<template>
    <div class="modal is-active">
        <div class="modal-background" @click="dismiss"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Settings</p>
                <button @click="dismiss" class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <!-- Content ... -->
            </section>
            <footer class="modal-card-foot">
                <button class="button is-primary">Save changes</button>
            </footer>
        </div>
    </div>
</template>

<script>
export default {
    name: 'settings',
    methods: {
        dismiss() {
            this.$emit('dismiss');
        }
    }
};
</script>