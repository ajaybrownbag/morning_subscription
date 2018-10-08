export const Heading = ({ headings }) => {
  return <thead>
    <tr>
      { headings.map(heading => <th>{ heading }</th>)}
    </tr>
  </thead>
}

export const Body = ({ rows }) => {
  return <tbody>
    { rows.map(row => <tr>
      <td> { row.map(td => td) } </td>
    </tr>)
  }
  </tbody>
}

// Table Facade.
// We just need to pass the `data`,
// and the Facade will hide all the internal complexity.
export const Table = ({ data }) => {
  const headings = buildHeadings(data)
  const rows = buildRows(data, headings)

  return <table>
    <Heading headings={headings} />
    <Body rows={rows} />
  </table>
}
