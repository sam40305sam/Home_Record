<template>
  <q-item v-if:="!content.childrens" clickable :to="content.link">
    <q-item-section v-if="content.icon" avatar>
      <q-icon :name="content.icon" />
    </q-item-section>

    <q-item-section>
      <q-item-label>{{ content.title }}</q-item-label>
    </q-item-section>
  </q-item>

  <q-expansion-item
    v-if="content.childrens"
    :label="content.title"
    :icon="content.icon"
    :caption="content.caption"
    :content-inset-level="0.25"
  >
    <q-item
      v-for="child in content.childrens"
      :key="child.title"
      clickable
      :to="child.link"
    >
      <q-item-section v-if="child.icon" avatar>
        <q-icon :name="child.icon" />
      </q-item-section>

      <q-item-section>
        <q-item-label>{{ child.title }}</q-item-label>
        <q-item-label caption>{{ child.caption }}</q-item-label>
        <!-- link -->
      </q-item-section>
    </q-item>
  </q-expansion-item>
</template>

<script setup>
defineProps({
  content: {
    type: Object,
    required: true,
  },
});
</script>
