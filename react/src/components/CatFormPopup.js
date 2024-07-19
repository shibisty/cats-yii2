import React from 'react'
import { useQuery } from 'react-query'
import { CabinetService } from '../services/cabinet.service'

const CatFormPopup = ({
  formData,
  selectedCourses,
  onChange,
  onCheckboxChange,
  onSubmit,
  onClose,
}) => {
  const { data: courses = [], isLoading } = useQuery(
    'courses',
    CabinetService.getCourses
  )

  if (isLoading) return null

  return (
    <>
      <div className='popup active'>
        <button type='button' className='popup__close' onClick={onClose}>
          <svg width='20' height='20' viewBox='0 0 20 20' fill='none'>
            <path
              d='M2.06146 19.9163L0.078125 17.933L8.01146 9.99967L0.078125 2.06634L2.06146 0.0830078L9.99479 8.01634L17.9281 0.0830078L19.9115 2.06634L11.9781 9.99967L19.9115 17.933L17.9281 19.9163L9.99479 11.983L2.06146 19.9163Z'
              fill='#AEAEAE'
            />
          </svg>
        </button>
        <div className='popup__title'>
          Додати нового котика та зареєструвати на курс
        </div>
        <form className='popup__form' onSubmit={onSubmit}>
          <div className='form__group'>
            <span>Дані котика:</span>
            <div className='form__group__inputs'>
              <input
                type='text'
                name='last_name'
                placeholder='Прізвище'
                value={formData.last_name}
                onChange={onChange}
              />
              <input
                type='text'
                name='first_name'
                placeholder='Ім’я'
                value={formData.first_name}
                onChange={onChange}
              />
              <input
                type='text'
                name='age'
                placeholder='Вік'
                value={formData.age}
                onChange={onChange}
              />
              <input
                type='text'
                name='phone'
                placeholder='Номер котофону'
                value={formData.phone}
                onChange={onChange}
              />
            </div>
          </div>

          <div className='form__group'>
            <span>Оберіть курси:</span>
            <div className='form__group__checkers'>
              {courses.map(course => (
                <label key={course.id} className='group__item'>
                  <div className='group__item__headline'>
                    <span>{course.name}</span>
                    <input
                      className='course_checkbox'
                      type='checkbox'
                      checked={selectedCourses.some(c => c.id === course.id)}
                      onChange={() => onCheckboxChange(course)}
                    />
                    <div className='group__item__checker'>
                      <svg
                        width='24'
                        height='24'
                        viewBox='0 0 24 24'
                        fill='none'
                        xmlns='http://www.w3.org/2000/svg'
                      >
                        <circle cx='12' cy='12' r='11' fill='#9E96F6'></circle>
                        <path
                          d='M17.7071 9.70711L11.7071 15.7071C11.3166 16.0976 10.6834 16.0976 10.2929 15.7071L7.29289 12.7071C6.90237 12.3166 6.90237 11.6834 7.29289 11.2929C7.68342 10.9024 8.31658 10.9024 8.70711 11.2929L11 13.5858L16.2929 8.29289C16.6834 7.90237 17.3166 7.90237 17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711Z'
                          fill='white'
                        ></path>
                      </svg>
                    </div>
                  </div>
                  <div className='group__item__bot'>
                    <div className='group__item__price'>{course.price} грн</div>
                    <div className='group__item__bot-img'>
                      <img src={course.thumb} alt={course.name} />
                    </div>
                  </div>
                </label>
              ))}
            </div>
          </div>

          <div className='popup__form__bot'>
            <div className='summ'>
              Загальна сума:{' '}
              <span className='sum__colored'>
                {selectedCourses.reduce(
                  (total, c) => total + parseFloat(c.price),
                  0
                )}{' '}
                грн
              </span>
            </div>
            <button type='submit' className='button button__from__bot-submit'>
              Продовжити
            </button>
          </div>
        </form>
      </div>
      <div className='overlay'></div>
    </>
  )
}

export default CatFormPopup
