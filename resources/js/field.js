import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-nova-live-edit-field', IndexField)
  app.component('detail-nova-live-edit-field', DetailField)
  app.component('form-nova-live-edit-field', FormField)
})
