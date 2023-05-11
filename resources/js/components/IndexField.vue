<template>
  <span>
      <input @change="(e) => saveItems(resourceName,  field.id, field.attribute, e.target.value)"
             @click.prevent.stop="() => {}" class="w-100 pa-2 form-control" type="text" :value="field.value">
  </span>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
    methods: {
        saveItems(resourceName, id, attribute, value) {
            return Nova.request().post(`/live-update/update/${resourceName}`, {
                id: id,
                attribute: attribute,
                value: value,
            });
        },
    },
    computed: {
        fieldValue() {
            return this.field.displayedAs || this.field.value
        },
    }
}
</script>
