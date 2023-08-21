import React, { useState } from 'react';

const Users = () => {
  const [selectedUsers, setSelectedUsers] = useState([]);
  const [selectAll, setSelectAll] = useState(false);

  const users = [
    'Alice',
    'Bob',
    'Charlie',
    'David',
    'Emma',
    'Frank',
    'Grace',
    'Helen',
    'Ivy',
    'Jack',
    'Kevin',
    'Lily',
    'Mike',
    'Nora',
    'Oliver',
    'Penny',
    'Quincy',
    'Rachel',
    'Sam',
    'Tom',
  ];

  const handleCheckboxChange = (event, username) => {
    if (event.target.checked) {
      setSelectedUsers([...selectedUsers, username]);
    } else {
      setSelectedUsers(selectedUsers.filter(user => user !== username));
    }
  };

  const handleSelectAllChange = event => {
    setSelectAll(event.target.checked);
    setSelectedUsers(event.target.checked ? users : []);
  };

  return (
    <div>
      <label>
        <input
          type="checkbox"
          checked={selectAll}
          onChange={handleSelectAllChange}
        />
        Marcar Todos
      </label>

      <table>
        <thead>
          <tr>
            <th>Selecionar</th>
            <th>Nome</th>
          </tr>
        </thead>
        <tbody>
          {users.map(user => (
            <tr key={user}>
              <td>
                <input
                  type="checkbox"
                  checked={selectedUsers.includes(user)}
                  onChange={event => handleCheckboxChange(event, user)}
                />
              </td>
              <td>{user}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default Users;
