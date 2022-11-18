<template>
    <div class="container">
        <portefolio />
        <formation />
        <competance />
        <experience />
    </div>
</template>

<script>
import Competance from "./Competance.vue";
import Experience from "./Experience.vue";
import Formation from "./Formation.vue";
import Portefolio from "./Portefolio.vue";
export default {
    components: {
        Portefolio,
        Formation,
        Competance,
        Experience,
    },
};
</script>

<style></style>
