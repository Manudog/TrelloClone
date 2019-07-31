<template>
      <div>
            <div>
                  <button v-show="addItem" type="submit" class="item-add"  @click="show=!show, addItem=!addItem"><i class="fas fa-plus"></i> Ajouter un item</button>
                  <form class="form-card" v-show="show" @submit.prevent="submitItem">
                        <div class="form-group">
                              <input type="text" class="form-control" :class="{'is-invalid':errors.title}" v-model="form.title" placeholder="Titre de l'item"/>
                              <p class="text-danger" v-if="errors.title" v-text="errors.title[0]"></p>
                              <input type="hidden" class="form-control" v-model="dataCard"/>
                              <input type="hidden" class="form-control" v-model="dataList"/>
                        </div>
                        <button type="submit" class="button b-green">Valider</button>
                        <i class="fas fa-times close-card" @click="show=!show, addItem=!addItem"></i>
                  </form>
            </div>
      </div>
</template>

<script>
export default {
      
      props: ['dataCard', 'dataList'],

      data() {
            return {
                  show : false,
                  addItem: true,
                  form: {
                        title: '',
                        dataCard: this.dataCard,
                        dataList: this.dataList
                  },
                  errors: {}
            }
      },
      methods: {
            submitItem() {
                  axios.post('/item', this.form)
                        .then(({data}) => {
                              this.$emit('newItem', data),
                              this.form.title = '',
                              this.show = false,
                              this.addItem = true,
                              this.errors = {}
                        })
                        .catch(error => {
                              this.errors = error.response.data.errors
                        })
            }
      }
}
</script>