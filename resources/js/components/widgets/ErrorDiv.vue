<template>
  <div v-if="form.errors.has(field)" class="warn" v-html="form.errors.get(field)"/>
</template>

<script>
export default {
  name: 'error-div',
  props: {
    form: {
      type: Object,
      required: true
    },
    field: {
      type: String,
      required: true
    }
  }
}
</script>
