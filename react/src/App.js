import React, { useState } from 'react'
import { useQuery, useQueryClient } from 'react-query'
import { CabinetService } from './services/cabinet.service'
import CatList from './components/CatList'
import CatFormPopup from './components/CatFormPopup'

const App = () => {
  const queryClient = useQueryClient()
  const { data: cats = [], isLoading } = useQuery(
    'cats',
    CabinetService.getCats
  )

  const [showPopup, setShowPopup] = useState(false)
  const [formData, setFormData] = useState({
    last_name: '',
    first_name: '',
    age: '',
    phone: '',
  })
  const [selectedCourses, setSelectedCourses] = useState([])

  const handlePopupShowClick = () => setShowPopup(true)
  const handlePopupClose = () => setShowPopup(false)

  const handleFormChange = e => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    })
  }

  const handleCheckboxChange = course => {
    setSelectedCourses(prev => {
      const isSelected = prev.some(c => c.id === course.id)
      return isSelected
        ? prev.filter(c => c.id !== course.id)
        : [...prev, course]
    })
  }

  const handleSubmit = async e => {
    e.preventDefault()

    const isFormDataValid = Object.values(formData).every(
      value => value.trim() !== ''
    )

    if (selectedCourses.length > 0 && isFormDataValid) {
      console.log('send req')
      const response = await CabinetService.addCat(formData, selectedCourses)
      if (response.id) {
        queryClient.invalidateQueries('cats')

        setFormData({ last_name: '', first_name: '', age: '', phone: '' })
        setSelectedCourses([])
        setShowPopup(false)
      }
    }else{
      console.log('invalid form data')
    }
  }

  if (isLoading) return null

  return (
    <>
      <div className='content'>
        <div className='cabinet__container'>
          <h1 className='cabinet__title'>Вітаємо в особистому кабінеті</h1>
          <CatList cats={cats} />
          <div className='cabinet__block'>
            <div className='cabinet__block__title'>
              Додати нового котика та зареєструвати на курс
            </div>
            <button
              className='button button__add button__add-mt'
              onClick={handlePopupShowClick}
            >
              Додати котика
            </button>
          </div>
        </div>
      </div>

      {showPopup && (
        <CatFormPopup
          formData={formData}
          selectedCourses={selectedCourses}
          onChange={handleFormChange}
          onCheckboxChange={handleCheckboxChange}
          onSubmit={handleSubmit}
          onClose={handlePopupClose}
        />
      )}
    </>
  )
}

export default App
