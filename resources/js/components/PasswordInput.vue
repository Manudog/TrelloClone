<template>
      <div>
            <input :type="show ? 'text' : 'password'"/>
            <!-- <input type="checkbox" v-model="show"/> -->
            <button type="button" @click="show=!show">
                  <i v-show="!show">Voir</i>
                  <i v-show="show">Cacher</i>
            </button>
      </div>
</template>

<script>
export default {
      data() {
            return {
                  show : false,
            }
      }
}
</script>
