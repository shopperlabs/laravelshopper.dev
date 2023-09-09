export default (Alpine) => {
  Alpine.data('tableOfContents', (contents) => ({
    current: null,
    headings: [],
    init() {
      this.getHeadings()
      this.updateCurrentSection()
    },
    getHeadings() {
      const headings = JSON.parse(JSON.stringify(contents))
      const arrayHeadings = Object.keys(headings).map((key) => headings[key])
      this.headings = arrayHeadings
        .flatMap((node) => [node.anchor])
        .map((id) => {
          let el = document.getElementById(id)
          if (!el) return

          let style = window.getComputedStyle(el)
          let scrollMt = parseInt(style.scrollMarginTop)

          let top =
            window.scrollY +
            el.getBoundingClientRect().top -
            scrollMt
          return { id, top }
        })
    },
    updateCurrentSection() {
      let top = window.scrollY + 150
      let current = this.headings[0].id
      for (let heading of this.headings) {
        if (top >= heading.top) {
          current = heading.id
        } else {
          break
        }
      }
      this.current = current ?? null
    },
  }))
}
