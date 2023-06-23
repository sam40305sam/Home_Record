<template>
  <div>{{ hi }}, {{ range }}</div>
</template>

<script setup>
import { ref, watch } from "vue";
import { useRoute } from "vue-router";

const hi = ref("hi");

const route = useRoute();
const range = ref(route.params.range);
watch(
  () => route.params.range,
  async (newRange) => {
    range.value = await newRange;
  }
);
</script>
