import React from 'react'

const InlineCustomers = ({ customers }) => (
    <div className="area-section_inline-customers">
        {customers?.map((customer, index) => (
            <div className="customer" key={index}>
                <img
                    src={customer.logo}
                    alt={customer.name}
                    width="300"
                    height="150"
                />
                <p className="country">{customer.country}</p>
                <p className="description">{customer.description}</p>
            </div>
        ))}
    </div>
)

export default InlineCustomers
