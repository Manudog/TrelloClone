<template>
      <div>
            <div>
                  <h2 class="list-title" v-if="!editing" @click="enableEditing">{{dataTitle}}</h2>
                  <input v-if="editing" type="text" class="input-title" v-model="dataTitle" @keyup.enter="saveEdit" v-focus/>
                  <input type="hidden" class="form-control" v-model="dataList"/>
            </div>
      </div>
</template>

<script>
export default {
      
      props: ['dataTitle', 'dataList'],

      data() {
            return {
                  form: {
                        title: '',
                        dataTitle: this.dataTitle,
                        dataList: this.dataList,
                  },
                  errors: {},
                  tempValue: null,
                  editing: false
            }
      },
      methods: {
            // submitItem() {
            //       axios.post('/item', this.form)
            //             .then(({data}) => {
            //                   this.$emit('newItem', data),
            //                   this.form.title = '',
            //                   this.show = false,
            //                   this.addItem = true,
            //                   this.errors = {}
            //             })
            //             .catch(error => {
            //                   this.errors = error.response.data.errors
            //             })
            // }
            enableEditing: function(){
                  this.tempValue = this.value;
                  this.editing = true;
            },
            disableEditing: function(){
                  this.tempValue = null;
                  this.editing = false;
            },
            saveEdit: function(){
                  axios.post('/liste/title', this.form)
                        .then(({data}) => {
                              this.form.title = '',
                              this.form.dataList = '',
                              this.errors = {}
                        })
                        .catch(error => {
                              this.errors = error.response.data.errors
                        })
                  this.value = this.tempValue;
                  this.disableEditing();
            }
      },
      directives: {
            focus: {
                  inserted (el) {
                        el.focus()
                  }
            }
      }
      
}
</script>