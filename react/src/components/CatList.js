import React from 'react'

const CatList = ({ cats }) => {
  if (cats.length === 0) return null

  return (
    <div className='cabinet__cats__full__list'>
      <div className='cabinet__sub__title cabinet__sub__title-mt'>
        Ваші котики:
      </div>
      {cats.map(cat => (
        <div key={cat.id} className='cabinet__cat'>
          <div className='cabinet__cat__left'>
            <div className='cabinet__cat__thumb'>
              <img src={cat.courses[0]?.thumb} alt={cat.first_name} />
            </div>
            <div className='cabinet__cat__desc'>
              <div className='cat__title'>
                {cat.first_name} {cat.last_name}
              </div>
              <div className='cat__age'>{cat.age}</div>
              <div className='cat__tel'>{cat.phone}</div>
            </div>
          </div>
          <div className='cabinet__cat__right'>
            <div className='cabinet__cat__selected'>Обрані курси:</div>
            <div className='cabinet__cat__list'>
              <ul>
                {cat.courses.map(course => (
                  <li key={course.id}>{course.name}</li>
                ))}
              </ul>
            </div>
            <button
              type='button'
              className='button button__from__bot-submit button__from__bot-submit__full'
            >
              Додати новий курс
            </button>
          </div>
        </div>
      ))}
    </div>
  )
}

export default CatList
