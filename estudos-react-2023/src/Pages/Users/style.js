import styled from 'styled-components';

const Table = styled.table`
  border-collapse: collapse;
  width: 100%;
  max-width: 400px;
  margin: 0 auto;
`;

const TableRow = styled.tr`
  border-bottom: 1px solid #ccc;
`;

const TableCell = styled.td`
  padding: 8px;
`;

const CheckboxCell = styled(TableCell)`
  text-align: center;
`;

export {
    Table,
    TableRow,
    TableCell,
    CheckboxCell
}