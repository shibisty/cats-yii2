export const CabinetService = {
  getCourses: async() => {
      try {
        const response = await fetch(`/api/course`, {
          method: 'GET',
          headers: { 'Content-Type': 'application/json' },
        })

        return response.json()
      } catch (error) {
        console.error(error)
      }
  },
  getCats: async () => {
      try {
        const response = await fetch(`/api/cat`, {
          method: 'GET',
          headers: { 'Content-Type': 'application/json' },
        })

        return response.json()
      } catch (error) {
        console.error(error)
      }
  },
  addCat: async (formData, selectedCourses) => {
    const courseIds = selectedCourses.map(course => course.id)
    const data = { ...formData, courseIds: courseIds }
    try {
      const response = await fetch(`/api/cat/add`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
      })

      return response.json()
    } catch (error) {
      console.error(error)
    }
  },
}
