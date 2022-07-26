select *, DATEDIFF(dept_emp.from_date , dept_emp.to_date) as job_days from employees 
join dept_emp on employees.emp_no=dept_emp.emp_no
join departments on departments.dept_no=dept_emp.dept_no order by job_days limit 10;